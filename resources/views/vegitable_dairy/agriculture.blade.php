<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARP APP</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Custom styles for your application */
        .entries-container {
            display: flex;
            align-items: center;
        }
        .entries-container label {
            margin-bottom: 0;
        }
        .entries-container select {
            display: inline-block;
            width: auto;
        }
        /* Add more custom styles as needed */
    </style>


<style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dropdown-label {
            font-weight: bold;
        }
        .bold-label {
            font-weight: bold;
        }
        .color-label {
            color: green;
        }
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }



        .button-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .custom-button {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 150px;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            background-size: cover;
            background-position: center;
            border: none;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .custom-button:hover {
            transform: scale(1.05);
            font-size: 1.5rem; /* Slightly increase font size on hover */
        }

    </style>
</head>
<body>

<div class="frame">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>

    <div class="right-column">
        <div class="container mt-5 mt-1 border rounded custom-border p-4" style="box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);">
            <h3 style="font-size: 2rem; color: green;">Add Agriculture</h3>
        </div>
        </br>

        <!-- Button Grid -->
        <div class="button-grid">
            <button onclick="window.location.href='{{ route('vegitable.create') }}';" class="custom-button" style="background-image: url('assets/images/vegetables.jpg'); font-size: 2rem; font-weight: bold;">
                Vegitables
            </button>
            <button onclick="window.location.href='{{ route('fruit.create') }}';" class="custom-button" style="background-image: url('assets/images/fruits.png'); font-size: 2rem; font-weight: bold;">
                Fruits
            </button>
            <button onclick="window.location.href='{{ route('homegarden.create') }}';" class="custom-button" style="background-image: url('assets/images/homegarden.jpeg'); font-size: 2rem; font-weight: bold;">
                Home Garden
            </button>
            <button class="custom-button" style="background-image: url('assets/images/others.jpg'); font-size: 2rem; font-weight: bold;">
                Others
            </button>
        </div>

    </div>
    </div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


</body>
</html>
