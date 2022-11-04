<?php 

interface ReaderInterface{

    /** @param tablename - name of the table to get the record from
     * @param ids - the id of the specific record
     * Returns a specific record from a table
     * @return - an array of records that match the criteria
     */
    public function find(string $tablename, array $ids): array;

    /** @param tablename - the table to return records from
     * @param id 
     * Returns the entire table
     * @return - an array of all records
     */
    public function findAll(string $tablename, array $ids): array;
}