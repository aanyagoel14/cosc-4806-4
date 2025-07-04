<?php require_once 'app/views/templates/header.php'; ?>

<div class="container">
    <h1>Create Reminder</h1>

    <?php if (!empty($data['error'])): ?>
        <p style="color:red;"><?= htmlspecialchars($data['error']) ?></p>
    <?php endif; ?>

    <form method="POST" action="/reminders/create">
        <div>
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" required>
        </div>

        <div>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea>
        </div>

        <div>
            <button type="submit">Create</button>
        </div>
    </form>

    <p><a href="/reminders">Back to reminders list</a></p>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
