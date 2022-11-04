<?php

interface WriterInterface{

    /** @param tables - the table to be altered 
     * @param fields - the fields to be altered
     * add a record to the database
     * 
     */
    public function add(array $tables, array $fields);
}