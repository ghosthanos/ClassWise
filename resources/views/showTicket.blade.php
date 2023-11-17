<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Booked Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .view-bookings-btn {
            position: absolute;
            top: 30px;
            left: 30px;
            background-color: #2196F3;
            padding: 10px 15px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .ticket-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .ticket {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
            position: relative; /* Add position relative for absolute positioning of the button */
        }

        .cancel-button {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #dc3545;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        h2 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h2>Your Booked Tickets</h2>
    <button class="view-bookings-btn" onclick="window.location.href='events'">Dashboard</button>
    <div class="ticket-container">
        <?php
        // Assuming $userTickets is an array of tickets fetched from the backend
         // Replace with your actual data

        if (!empty($tickets)) {
            foreach ($tickets as $ticket) {
                ?>
                <div class="ticket">
                    <h3><?= $ticket->event_title ?></h3>
                    <p>Amount: <?= $ticket->amount ?></p>
                    <p>Price: $<?= $ticket->price ?></p>
                    <form method="POST" action="{{ url("/$ticket->user_id/ticket/delete/$ticket->id") }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cancel-button">Cancel</button>
                    </form>
                </div>
            <?php
            }
        } else {
            ?>
            <p>No tickets booked yet.</p>
        <?php } ?>
    </div>

    <script>
        function cancelTicket(ticketId) {
            // Implement redirection logic here
            window.location.href = '/<?= $ticket->user_id ?>/ticket/delete/' + ticketId;
        }
    </script>

</body>
</html>
