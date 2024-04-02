<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Center background image */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .bg-center {
            background-position: center;
        }

        /* White background for form */
        .form-bg {
            background-color: #ffffff;
        }
    </style>
</head>

<body class="bg-center bg-cover" style="background-image: url('images/employeebg.jpg');">

    <div class="flex justify-between max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Add Users Form -->
        <div class="w-1/3 p-5 mt-16 form-bg shadow-xl rounded-xl">
            <h1 class="mb-6 text-4xl font-bold text-black">Add Users</h1>
            <form method="POST" action="" enctype="multipart/form-data">
                <!-- First Name -->
                <div class="mb-4">
                        <label for="fname" class="block mb-2 text-sm font-bold text-gray-700">First Name</label>
                        <input type="text" id="fname" name="fname" placeholder="John"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Last Name -->
                    <div class="mb-4">
                        <label for="lname" class="block mb-2 text-sm font-bold text-gray-700">Last Name</label>
                        <input type="text" id="lname" name="lname" placeholder="Doe"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-4">
                        <label for="phone-num" class="block mb-2 text-sm font-bold text-gray-700">Phone Number</label>
                        <input type="tel" id="phoneNum" name="phoneNum"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="block mb-2 text-sm font-bold text-gray-700">Address</label>
                        <input type="text" id="address" name="address" placeholder="1234 Main St"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block mb-2 text-sm font-bold text-gray-700">Username</label>
                        <input type="text" id="username" name="username"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Profile Image Upload -->
                    <div class="mb-4">
                        <label for="images" class="block mb-2 text-sm font-bold text-gray-700">Profile Image</label>
                        <input type="file" class="form-control-file" id="images" name="images">
                    </div>
                <div class="mb-4">
                    <label for="fname" class="block mb-2 text-sm font-bold text-gray-700">First Name</label>
                    <input type="text" id="fname" name="fname" placeholder="John"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>
                <!-- Submit Button -->
                <!-- <button type="submit"
                    class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
                    Add Employee
                </button> -->
            </form>
        </div>
        <!-- Users List -->
        <div class="w-2/3 p-5 mt-16 form-bg shadow-xl rounded-xl ml-4">
            <h2 class="text-3xl font-bold mb-3">Users List</h2>
            <!-- Your table here -->
            <!-- Example table -->
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">First Name</th>
                        <th class="px-4 py-2">Last Name</th>
                        <th class="px-4 py-2">Phone Number</th>
                        <th class="px-4 py-2">Address</th>
                        <th class="px-4 py-2">Username</th>
                        <th class="px-4 py-2">Profile Image</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample data row -->
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">John</td>
                        <td class="border px-4 py-2">Doe</td>
                        <td class="border px-4 py-2">123-456-7890</td>
                        <td class="border px-4 py-2">123 Main St</td>
                        <td class="border px-4 py-2">johndoe</td>
                        <td class="border px-4 py-2"><img src="https://via.placeholder.com/50"
                                alt="Profile Image"></td>
                        <td class="border px-4 py-2">
                        <button type="submit"
    class="px-4 py-2 mr-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
    Read
</button>
                        
<button type="submit"
    class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
    Delete
</button>

                        </td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>


    <!-- Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

