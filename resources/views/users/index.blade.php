<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #e8f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 800px;
            box-sizing: border-box;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            width: calc(100% - 24px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            margin-bottom: 10px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 350px;
            text-align: left;
            box-sizing: border-box;
            border: 2px solid #d0d0d0;
        }
        .card p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }
        .card .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card .name {
            font-weight: bold;
        }
        .card .phone {
            font-size: 14px;
            background-color: #d0eaff;
            border-radius: 4px;
            padding: 4px 8px;
            margin-left: 20px;
        }
        @media (max-width: 768px) {
            .card {
                width: 100%;
                max-width: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="searchForm">
            <input type="text" id="searchInput" placeholder="Search by Name/Department/Designation">
        </form>
        <div class="card-container" id="userContainer">
            @foreach($users as $user)
                <div class="card" data-name="{{ $user->name }}" data-department="{{ $user->department->name }}" data-designation="{{ $user->designation->name }}">
                    <div class="info">
                        <p class="name">{{ $user->name }}</p>
                        <p class="phone">{{ $user->phone_number }}</p>
                    </div>
                    <p>{{ $user->department->name }}</p>
                    <p>{{ $user->designation->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var allCards = $('#userContainer .card').clone();
            function filterAndSort() {
                var searchValue = $('#searchInput').val().toLowerCase();
                var filteredCards = allCards.filter(function() {
                    var name = $(this).data('name').toLowerCase();
                    var department = $(this).data('department').toLowerCase();
                    var designation = $(this).data('designation').toLowerCase();
                    return searchValue === "" ||
                           name.indexOf(searchValue) > -1 || 
                           department.indexOf(searchValue) > -1 || 
                           designation.indexOf(searchValue) > -1;
                });
                var sortedCards = filteredCards.sort(function(a, b) {
                    var aText = $(a).data('name').toLowerCase();
                    var bText = $(b).data('name').toLowerCase();
                    return aText.localeCompare(bText);
                });
                $('#userContainer').html(sortedCards);
            }
            $('#searchInput').on('input', function() {
                filterAndSort();
            });
            filterAndSort();
        });
    </script>
</body>
</html>
