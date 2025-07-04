<?php

class Reminders extends Controller {

    public function index() {	
      $reminder = $this->model('Reminder');
      $list_of_reminders = $reminder->get_all_reminders();
	    $this->view('reminders/index', ['reminders' => $list_of_reminders]);
    }

    public function create() {
        // Check if user is logged in (assuming user_id in session)
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $subject = trim($_POST['subject'] ?? '');
            $description = trim($_POST['description'] ?? '');

            if ($subject === '') {
                $error = "Subject is required";
                $this->view('reminders/create', ['error' => $error]);
                return;
            }

            $reminder = $this->model('Reminder');
            $reminder->create_reminder($user_id, $subject, $description);

            header('Location: /reminders'); // Redirect to list after creation
            exit;
        } else {
            // Show create form
            $this->view('reminders/create');
        }
    }


}