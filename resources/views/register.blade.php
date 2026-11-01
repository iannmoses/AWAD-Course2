<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account — Student Management System</title>
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] } } } };
    </script>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-white text-slate-900 font-sans antialiased min-h-screen flex flex-col">
    <div class="flex-1 flex items-center justify-center p-4 bg-white">
        <div class="w-full max-w-md">
            <!-- Start: Brand -->
            <div class="flex justify-center mb-8">
                <a href="index.html"><img src="assets/img/logo.png" alt="Student Management System" class="h-16 w-16"></a>
            </div>
            <!-- End: Brand -->

            <!-- Start: Register card -->
            <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                <div class="mb-6">
                    <h1 class="text-xl font-bold">Create your account</h1>
                    <p class="mt-1 text-sm text-slate-500">Student accounts can be created here. Lecturers and administrators are added by an administrator.</p>
                    <p class="mt-2 text-xs text-[#d97706]">All fields are required.</p>
                </div>
                <form action="dashboard.html" method="get" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-600 mb-2">Full name <span class="text-[#d97706]">*</span></label>
                        <input type="text" id="name" name="name" required minlength="2" autofocus placeholder="Michael Kato" class="input-field">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">University email <span class="text-[#d97706]">*</span></label>
                        <input type="email" id="email" name="email" required  placeholder="michael.kato@mubs.ac.ug" class="input-field">
                    </div>
                    <div>
                        <label for="student_number" class="block text-sm font-medium text-slate-600 mb-2">Student number <span class="text-[#d97706]">*</span></label>
                        <input type="text" id="student_number" name="student_number" required  placeholder="2023/BCC/027" class="input-field">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-600 mb-2">Password <span class="text-[#d97706]">*</span></label>
                        <input type="password" id="password" name="password" required minlength="8" placeholder="" class="input-field">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-600 mb-2">Confirm password <span class="text-[#d97706]">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" placeholder="" class="input-field">
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Create account</button>
                </form>
                <p class="mt-6 text-center text-sm text-slate-500">Already registered? <a href="login.html" class="text-[#2563eb] hover:text-[#1d4ed8]">Sign in</a></p>
            </div>
            <!-- End: Register card -->
        </div>
    </div>

    <!-- Start: Footer -->
         <footer class="bg-[#1e3a8a] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-6"><img src="assets/img/logo.png" alt="" class="h-12 w-12"><span class="font-semibold">Student Management System</span></div>
                    <p class="text-blue-100 text-sm leading-relaxed max-w-sm">Manage students, courses, lecturers and course registrations for Makerere University Business School.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Quick links</h4>
                    <ul class="space-y-3 text-sm text-blue-100">
                        <li><a href="login.html" class="hover:text-white">Sign in</a></li>
                        <li><a href="register.html" class="hover:text-white">Create account</a></li>
                        <li><a href="courses/index.html" class="hover:text-white">Available courses</a></li>
                        <li><a href="lecturer/dashboard.html" class="hover:text-white">Lecturer home</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Contact</h4>
                    <ul class="space-y-2 text-sm text-blue-100">
                        <li>registry@mubs.ac.ug</li>
                        <li>Academic Registrar's office</li>
                        <li class="text-[#fbbf24] pt-2">Mon–Fri, 8:00am – 5:00pm</li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-blue-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-blue-200">
                <p>© 2026 Student Management System. All rights reserved.</p>
                <p>Privacy · Acceptable use · Registration policy</p>
            </div>
        </div>
    </footer>
    <!-- End: Footer -->

    <script>lucide.createIcons();</script>
</body>
</html>
