<?php

class Reminder {
    public function __construct() {

    }

    public function get_all_reminders () {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function create_reminder($user_id, $subject, $description) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO notes (user_id, subject, description, created_at) VALUES (?, ?, ?, NOW())");
        return $statement->execute([$user_id, $subject, $description]);
    }


    public function update_reminders ($reminder_id) {
      $db = db_connect();
        //do update statement
    }
}