<?php
session_start();

// Initialize session variables if not set
if (!isset($_SESSION['chatHistory'])) {
    $_SESSION['chatHistory'] = []; // Stores chat history
}

// Define sections and questions
$sections = [
    'assignments' => [
        'q1' => "How to submit an assignment?",
        'q2' => "What is the deadline for submission?"
    ],
    'exams' => [
        'q3' => "When is the next exam?",
        'q4' => "How to prepare for exams?"
    ],
    'general' => [
        'q5' => "How to contact the support team?",
        'q6' => "Where can I find the timetable?",
        'q7' => "What are the office hours?",
        'q8' => "How to reset my password?",
        'q9' => "What is the attendance policy?",
        'q10' => "How to access course materials?"
    ]
];

// Define answers for questions
$answers = [
    'q1' => "You can submit assignments via the student portal under the 'Assignments' tab.",
    'q2' => "The deadline for assignment submission is displayed in the course schedule.",
    'q3' => "The next exam date can be found on the exam schedule in your portal.",
    'q4' => "Prepare for exams by reviewing lecture notes and completing practice tests.",
    'q5' => "You can contact support via email at support@university.edu or call +123456789.",
    'q6' => "The timetable is available on the student portal under the 'Timetable' section.",
    'q7' => "Office hours are listed on your course syllabus and instructor's profile.",
    'q8' => "Reset your password via the 'Forgot Password' link on the login page.",
    'q9' => "The attendance policy is outlined in the student handbook.",
    'q10' => "Course materials are available in the 'Resources' section of the student portal."
];

// Handle form submission
if (isset($_POST['question'])) {
    $question = $_POST['question'];

    // Save selected question and answer to chat history
    if (array_key_exists($question, $answers)) {
        // Find the full question text from any section
        $fullQuestion = null;
        foreach ($sections as $sectionQuestions) {
            if (isset($sectionQuestions[$question])) {
                $fullQuestion = $sectionQuestions[$question];
                break;
            }
        }

        // Add to chat history
        $_SESSION['chatHistory'][] = [
            'question' => $fullQuestion ?? "Unknown question",
            'answer' => $answers[$question]
        ];

        // Remove the oldest entry if chat history exceeds 10 entries
        if (count($_SESSION['chatHistory']) > 10) {
            array_shift($_SESSION['chatHistory']);
        }
    }
}

// Handle chat reset (clear chat history)
if (isset($_POST['clear_chat'])) {
    $_SESSION['chatHistory'] = [];
}

// Render the chat history
$chatHistoryHtml = '';
foreach ($_SESSION['chatHistory'] as $entry) {
    $chatHistoryHtml .= "<div class='chat-entry'>
                            <strong>Q:</strong> {$entry['question']}<br><strong>A:</strong> {$entry['answer']}
                          </div><hr>";
}

// Render questions
$questionsHtml = "<h4>Questions:</h4>";
foreach ($sections as $sectionName => $sectionQuestions) {
    foreach ($sectionQuestions as $key => $question) {
        $questionsHtml .= "<form method='POST' style='display:block;'>
                                <button name='question' value='$key' type='submit'>$question</button>
                           </form>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot: Re-Ask Questions</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
        }
        #main-container {
            display: flex;
            width: 100%;
        }
        #left-sidebar {
            flex: 1;
            background: #f9f9f9;
            border-right: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        #right-sidebar {
            flex: 2;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px;
            overflow-y: auto;
        }
        .scrollable {
            overflow-y: auto;
            max-height: 500px;
        }
        .chat-entry {
            padding: 10px;
            margin-bottom: 10px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        h3, h4 {
            margin-top: 0;
        }
        button {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px 0;
            transition: background 0.3s;
            font-size: 14px;
        }
        button:hover {
            background: #0056b3;
        }
        .clear-btn {
            background: #e74c3c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .clear-btn:hover {
            background: #c0392b;
        }
        .back-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 30px;
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div>
    <a href="" class=back-icon>
        <i class="bi bi-arrow-left-circle"></i>
    </a>
    </div>
    <div id="main-container">
        <!-- Left Sidebar for Questions -->
        <div id="left-sidebar">
            <?php echo $questionsHtml; ?>
        </div>

        <!-- Right Sidebar for Chat History -->
        <div id="right-sidebar">
            <h3>Chat History:</h3>
            <div class="scrollable">
                <?php echo $chatHistoryHtml ?: "<p>No questions asked yet.</p>"; ?>
            </div>
            <form method="POST">
                <button type="submit" name="clear_chat" class="clear-btn">Clear Chat</button>
            </form>
        </div>
    </div>
</body>
</html>
