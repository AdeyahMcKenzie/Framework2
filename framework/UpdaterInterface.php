<?php 

interface UpdaterInterface{

    /** @param tables - the table(s) to be updated
     * @param fields - the field(s) to be updated
     */
    public function update(array $tables, array $fields);
}