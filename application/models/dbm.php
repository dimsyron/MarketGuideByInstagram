<?php

class Dbm extends CI_Model
{
	function general_select($table, $column = NULL, $where = NULL, $where_value = NULL, $order_column = NULL, $order_sort = NULL, $limit = NULL)
	{
		if ($column != NULL) {
			$this->db->select($column);
		} else {
			$this->db->select('*');
		}
		
		if ($where != NULL && $where_value != NULL) {
		$this->db->where($where, $where_value);
		}
		
		if ($order_column != NULL && $order_sort != NULL) {
		$this->db->order_by($order_column, $order_sort);
		}
		
		if ($limit != NULL) {
		$this->db->limit($limit);
		}

		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}

	function select($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}

	// Select single data
	function select_where($table, $column, $where, $where_value)
	{
		$this->db->select($column);
		$this->db->where($where, $where_value);
		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}

	// Select single data
	function select_where_2($table, $column, $where, $where_value, $where2, $where_value2)
	{
		$this->db->select($column);
		$this->db->where($where, $where_value);
		$this->db->where($where2, $where_value2);
		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}

	function select_sum_where($table, $column_sum, $where, $where_value)
	{
		$this->db->select_sum($column_sum);
		$this->db->where($where, $where_value);
		$query = $this->db->get($table);
		return $query;
	}

	function select_sum_all($table, $column_sum)
	{
		$this->db->select_sum($column_sum);
		$query = $this->db->get($table);
		return $query;
	}

	function select_order_by($table, $order_column, $order_sort)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($order_column, $order_sort);
		$query = $this->db->get();
		
		return $query;
	}

	function select_where_order_by($table, $where, $where_value, $order_column, $order_sort)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where, $where_value);
		$this->db->order_by($order_column, $order_sort);
		$query = $this->db->get();
		
		return $query;
	}

	// // Select count of data in table
	// function num_rows($table, $column, $where, $where_value)
	// {
	// 	$this->db->select($column);
	// 	$this->db->where($where, $where_value);
	// 	$this->db->from($table);
	// 	$query = $this->db->get();
		
	// 	return $query->num_rows();
	// }
	// // Select count of data in 2 table
	// function num_rows2($table, $column, $where, $where_value, $where2, $where_value2)
	// {
	// 	$this->db->select($column);
	// 	$this->db->where($where, $where_value);
	// 	$this->db->where($where2, $where_value2);
	// 	$this->db->from($table);
	// 	$query = $this->db->get();
		
	// 	return $query->num_rows();
	// }

	function update($table, $id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

	function update_column($table, $where, $where_value, $data)
	{
		$this->db->where($where, $where_value);
		$this->db->update($table, $data);
	}

	function login_admin($username, $password)
	{
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');

		if($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function get_admin_session($username, $password)
	{
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		$admin_data = $query->row();
		return $admin_data;
	}

	function join($first_table, $second_table, $select, $col_first, $col_second)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
		$query = $this->db->get();
		return $query;
	}

	function join_order_by($first_table, $second_table, $select, $col_first, $col_second, $order_column, $order_by)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
		$this->db->order_by($order_column, $order_sort);
		$query = $this->db->get();
		return $query;
	}

	function join_where($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
		$query = $this->db->get();
		return $query;
	}

	function join_where2($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value, $where2, $where_value2)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
        $this->db->where($where2, $where_value2); 
		$query = $this->db->get();
		return $query;
	}

	function join_where23($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value, $where2, $where_value2, $where3, $where_value3)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
        $this->db->where($where2, $where_value2); 
        $this->db->where($where3, $where_value3); 
		$query = $this->db->get();
		return $query;
	}

	function join_where_limit($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value, $limit)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
		$this->db->limit($limit);
		$query = $this->db->get();
		return $query;
	}

	function join_where_limit_order_by($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value, $limit, $order_column, $order_sort)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
		$this->db->limit($limit);
		$this->db->order_by($order_column, $order_sort);
		$query = $this->db->get();
		return $query;
	}

	function free_join_3_tables_where($select ,$first_table, $second_table, $third_table, $col_first, $col_second, $col_third, $where, $where_value)
	{
		$this->db->select($select);
        $this->db->from($first_table); 
        $this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first, 'left');
        $this->db->join($third_table, $third_table.'.'.$col_third .'='. $second_table.'.'.$col_second, 'left');
        $this->db->where($where, $where_value);      
        $query = $this->db->get();
        return$query;
	}

	function select_limit($table, $limit)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($limit);
		$query = $this->db->get();
		
		return $query;
	}

	function select_limit_order_by($table, $limit, $order_column, $order_by)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($limit);
		$this->db->order_by($order_column, $order_by);
		$query = $this->db->get();
		
		return $query;
	}

	function select_limit_order_by_where($table, $limit, $order_column, $order_by, $where, $where_value)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where, $where_value);
		$this->db->limit($limit);
		$this->db->order_by($order_column, $order_by);
		$query = $this->db->get();
		
		return $query;
	}

	function get_pagination($table, $column, $where, $where_value, $order_column, $order_sort, $limit_start, $limit_stop)
    {
    	$this->db->select($column);
		$this->db->from($table);
		if($where!=NULL || $where_value!=NULL)
		{
			$this->db->where($where, $where_value);
		}
		$this->db->order_by($order_column, $order_sort);
		$this->db->limit($limit_start, $limit_stop);
		$query = $this->db->get();
		
		return $query;
    }

	function get_pagination_join($first_table, $second_table, $column, $col_first, $col_second, $where, $where_value, $order_column, $order_sort, $limit_start, $limit_stop)
    {
    	$this->db->select($column);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
		if($where!=NULL || $where_value!=NULL)
		{
			$this->db->where($where, $where_value);
		}
		$this->db->order_by($order_column, $order_sort);
		$this->db->limit($limit_start, $limit_stop);
		$query = $this->db->get();
		
		return $query;
    }

	function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function insert_last_id($table, $data)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function delete($table, $where, $where_value)
	{
		$this->db->where($where, $where_value);
		$this->db->delete($table);
	}

}

?>