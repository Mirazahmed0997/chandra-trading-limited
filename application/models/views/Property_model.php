<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_model extends CI_Model
{
    private $table = 'properties';

    public function get_properties(
        $limit = 10,
        $offset = 0,
        $search = '',
        $type = '',
        $status = '',
        $featured = ''
    ) {
        $this->db->from($this->table);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('property_name', $search);
            $this->db->or_like('property_id', $search);
            $this->db->or_like('location', $search);
            $this->db->group_end();
        }

        if (!empty($type)) {
            $this->db->where('property_type', $type);
        }

        if (!empty($status)) {
            $this->db->where('status', $status);
        }

        if ($featured !== '') {
            $this->db->where('featured', $featured);
        }

        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result();
    }

    public function count_properties(
        $search = '',
        $type = '',
        $status = '',
        $featured = ''
    ) {
        $this->db->from($this->table);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('property_name', $search);
            $this->db->or_like('property_id', $search);
            $this->db->or_like('location', $search);
            $this->db->group_end();
        }

        if (!empty($type)) {
            $this->db->where('property_type', $type);
        }

        if (!empty($status)) {
            $this->db->where('status', $status);
        }

        if ($featured !== '') {
            $this->db->where('featured', $featured);
        }

        return $this->db->count_all_results();
    }
}