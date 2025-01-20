<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scholarship & Fee Schedule Notice</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
    }

    .container {
      width: 80%;
      margin: 20px auto;
      padding: 20px;
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    header {
      text-align: center;
    }

    h1 {
      color: #333;
    }

    .notice {
      margin-bottom: 30px;
    }

    .notice h2 {
      color: #0056b3;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .buttons {
      text-align: center;
    }

    button {
      padding: 10px 20px;
      margin: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    .back-button {
      background-color: #f44336;
    }

    .back-button:hover {
      background-color: #e53935;
    }

    /* Adjusting layout for buttons */
    .buttons-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .buttons-container button {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Student Notices</h1>
    </header>

    <!-- Scholarship Notice Section -->
    <section class="notice" id="scholarship-notice">
      <h2>Scholarship Notice</h2>
      <p>The scholarship application period for the 2024-2025 academic year is now open. Students are encouraged to apply by the deadline of December 15, 2024.</p>
      <ul>
        <li>Eligibility: Full-time students with a GPA of 3.5 or above.</li>
        <li>Application Deadline: December 15, 2024.</li>
        <li>Award Amount: Up to ₹500,000.</li>
      </ul>
    </section>

    <!-- Fee Schedule Section -->
    <section class="notice" id="fee-schedule">
      <h2>Fee Schedule</h2>
      <p>Below is the fee schedule for the upcoming semester:</p>
      <table>
        <thead>
          <tr>
            <th>Category</th>
            <th>Amount (₹)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tuition Fee</td>
            <td>₹200,000</td>
          </tr>
          <tr>
            <td>Lab Fees</td>
            <td>₹20,000</td>
          </tr>
          <tr>
            <td>Library Fees</td>
            <td>₹5,000</td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Print, Download, and Go Back Buttons -->
    <div class="buttons-container">
      <div class="buttons">
        <button onclick="printPage()">Print Notice</button>
        <button onclick="downloadPDF()">Download as PDF</button>
      </div>

      <!-- Go Back Button below the others -->
      <div class="buttons">
        <button class="back-button" onclick="goBack()">Go Back</button>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script>
    // Function to print the page
    function printPage() {
      window.print();
    }

    // Function to download the page content as a PDF
    function downloadPDF() {
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();

      // Adding Scholarship Notice to the PDF
      doc.text(20, 20, 'Scholarship Notice');
      doc.text(20, 30, 'The scholarship application period for the 2024-2025 academic year is now open...');
      doc.text(20, 40, 'Eligibility: Full-time students with a GPA of 3.5 or above.');
      doc.text(20, 50, 'Application Deadline: December 15, 2024.');
      doc.text(20, 60, 'Award Amount: Up to ₹500,000.');

      // Adding Fee Schedule to the PDF
      doc.text(20, 80, 'Fee Schedule');
      doc.autoTable({
        startY: 90,
        head: [['Category', 'Amount (₹)']],
        body: [
          ['Tuition Fee', '₹200,000'],
          ['Lab Fees', '₹20,000'],
          ['Library Fees', '₹5,000']
        ],
      });

      // Save the PDF
      doc.save('scholarship_fee_schedule.pdf');
    }

    // Function to go back to the previous page
    function goBack() {
      window.history.back();
    }
  </script>
</body>
</html>
