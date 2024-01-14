<?php
function generatePassword($length = 15, $options = [])
{
    $upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $lower = "abcdefghijklmnopqrstuvwxyz";
    $numbers = "0123456789";
    $special = "!@#$%^&*()-_=+";

    $characters = '';
    if ($options['uppercase']) $characters .= $upper;
    if ($options['lowercase']) $characters .= $lower;
    if ($options['numbers']) $characters .= $numbers;
    if ($options['special']) $characters .= $special;

    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-['Inter'] bg-gray-100 flex items-center justify-center h-screen text-sm">
    <div>
        <div class="bg-white p-8 rounded-lg border borer-gray-300 shadow-sm w-80 md:w-96 mx-auto">
            <h1 class="text-center text-2xl font-semibold">Password Generator</h1>
            <p class="text-center text-gray-600">Generate a secure password.</p>

            <!-- Display the generated password -->
            <div id="password-display" class="flex items-center justify-between mt-6 bg-gray-200 px-3 py-2.5 text-base rounded-lg text-center">
                <!-- Placeholder for generated password -->
                <span id="password-text"></span>
                <button class="copyButton text-black py-0.5" onclick="copyPassword()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="square" stroke-linejoin="square" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                    </svg>
                </button>
            </div>

            <!-- Updated button to regenerate the password -->
            <div class="mt-2">
                <button onclick="updatePassword()" class="w-full bg-blue-500 border border-blue-500 hover:border-blue-600 text-white px-3 py-2.5 rounded-lg block text-center">Generate Password</button>
            </div>
        </div>
        <div>
            <p class="text-center text-gray-400 text-xs mt-2">Developed by <a href="https://www.zasciahugo.com" class="underline">Zascia Hugo</a></p>
            <p class="text-center text-gray-400 text-xs">Copyright © 2024 Zascia Hugo</p>
        </div>
    </div>

    <script>
        function generatePassword(length) {
            const upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            const lower = "abcdefghijklmnopqrstuvwxyz";
            const numbers = "0123456789";
            const special = "!@#$%^&*()-_=+";
            let characters = upper + lower + numbers + special;
            let password = '';
            for (let i = 0; i < length; i++) {
                let randomIndex = Math.floor(Math.random() * characters.length);
                password += characters[randomIndex];
            }
            return password;
        }

        function updatePassword() {
            let newPassword = generatePassword(12);
            document.getElementById('password-text').textContent = newPassword;
        }


        function copyPassword() {
            // Get the password text
            var password = document.getElementById('password-display').textContent.trim();

            // Create a temporary textarea element to copy the text to the clipboard
            var tempTextArea = document.createElement('textarea');
            tempTextArea.value = password;
            document.body.appendChild(tempTextArea);

            // Select and copy the text
            tempTextArea.select();
            document.execCommand('copy');

            // Remove the temporary textarea element
            document.body.removeChild(tempTextArea);

            // Optionally, you can provide user feedback, such as a tooltip or message
            alert('Password copied: ' + password);
        }

        document.addEventListener('DOMContentLoaded', function() {
            updatePassword();
        });
    </script>
</body>

</html>