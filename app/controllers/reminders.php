<?php

class Reminders extends Controller {

    public function index() {	
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            header('Location: /login');
            exit();
        }
        $reminder = $this->model('Reminder');
        $list_of_reminders = $reminder->get_all_reminders([$user_id]);
	    $this->view('reminders/index', ['reminders' => $list_of_reminders]);
    }

    public function create(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            header('Location: /login');
            exit();
        }
        $R = $this->model('Reminder');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $subject = $_POST['subject'];
            $description = $_POST['description']; // optional
            $R->create_reminder($user_id, $subject, $description);
            header('Location: /reminders/index');
            exit();
        }

        $this->view('reminders/create');
    }


}