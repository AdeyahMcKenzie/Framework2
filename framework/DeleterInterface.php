<?php 

interface DeleterInterface{

    /** @param tablenames - the table to be altered
     * @param ids - id(s) of the records to be deleted
     * delete a record(s) from the database
     */
    public function del(array $tablenames, array $ids);
}