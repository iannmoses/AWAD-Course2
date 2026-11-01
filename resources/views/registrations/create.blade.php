@extends('layouts.main')
@section('content')
    <!-- Start: Sidebar toggle (checkbox, no JavaScript) -->
    <input type="checkbox" id="sidebar-toggle" class="peer hidden">
    <label for="sidebar-toggle" class="fixed inset-0 bg-slate-900/30 z-30 hidden peer-checked:block sm:!hidden"></label>
    <!-- End: Sidebar toggle -->

    <!-- Start: Header -->
      @include('layouts.header')
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 -translate-x-full peer-checked:translate-x-0 sm:translate-x-0 bg-white border-r border-slate-200 flex flex-col">
        <div class="flex-1 px-3 py-4 overflow-y-auto sidebar-scrollbar">
            <div class="space-y-1 mb-5"><p class="px-3 text-xs font-semibold text-slate-400 uppercase mb-2">Main</p><a href="../dashboard.html" class="sidebar-item border-l-3 border-transparent text-slate-500 flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="layout-dashboard" class="w-5 h-5 text-slate-400 group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">Dashboard</span></a><a href="../courses/index.html" class="sidebar-item border-l-3 border-transparent text-slate-500 flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="book-open" class="w-5 h-5 text-slate-400 group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">Available courses</span></a><a href="../registrations/index.html" class="sidebar-item border-l-3 border-transparent text-slate-500 flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="clipboard-check" class="w-5 h-5 text-slate-400 group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">My registrations</span></a><a href="../registrations/create.html" class="sidebar-item active border-l-3 border-[#2563eb] bg-blue-50 text-[#2563eb] flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="plus-circle" class="w-5 h-5 text-[#2563eb] group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">Register for a course</span></a></div><div class="space-y-1 mb-5"><p class="px-3 text-xs font-semibold text-slate-400 uppercase mb-2">Account</p><a href="../profile.html" class="sidebar-item border-l-3 border-transparent text-slate-500 flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="user-cog" class="w-5 h-5 text-slate-400 group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">My Account</span></a></div>
        </div>
        <!-- Start: Sidebar user card -->
        <div class="mt-auto border-t border-slate-200 p-4">
            <div class="flex items-center space-x-3 mb-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center bg-white text-sm font-semibold text-[#2563eb]">MK</div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full"></div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-900 truncate">Michael Kato</p>
                    <p class="text-xs text-slate-500 truncate">michael.kato@mubs.ac.ug</p>
                </div>
            </div>
            <div class="flex items-center gap-2 px-3 py-2 bg-white rounded-lg border border-slate-200">
                <i data-lucide="graduation-cap" class="w-4 h-4 text-[#2563eb]"></i>
                <span class="text-xs font-semibold text-slate-800 uppercase tracking-wide">Student</span>
            </div>
        </div>
        <!-- End: Sidebar user card -->
    </aside>
    <!-- End: Sidebar -->

    <!-- Start: Main content -->
    <div class="pt-16 sm:pl-64 min-h-screen flex flex-col">
        <main class="flex-1 pb-8 px-4 sm:px-8 lg:px-10 pt-6">
            <!-- Start: Page heading -->
            <div class="max-w-2xl">
                <h1 class="text-xl font-semibold mb-2">Register for a course</h1>
                <p class="text-sm text-slate-500 mb-6">Choose a course for Semester I, 2026/2027. You cannot register for the same course twice.</p>
            </div>
            <!-- End: Page heading -->

            <!-- Start: Error message (what Laravel shows when validation fails) -->
            <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6 text-sm max-w-2xl">
                <i data-lucide="alert-circle" class="w-5 h-5 shrink-0"></i>
                <div><p class="font-semibold">Registration failed</p><p class="mt-0.5">You are already registered for BUC 3131. Pick a different course.</p></div>
            </div>
            <!-- End: Error message -->

            <!-- Start: Form -->
            <form action="index.html" method="get" class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm max-w-2xl">
                <div class="p-6 space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">Student</label>
                        <input type="text" class="input-field bg-slate-50" name="student" value="Michael Kato · 2023/BCC/027" placeholder="" required readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">Course</label>
                        <select name="course" class="input-field border-red-300"><option selected>BUC 3131 — Advanced Web Application Development</option><option>BUC 3102 — Database Management Systems</option><option>BAM 3105 — Business Research Methods</option><option>BAM 3110 — Project Planning and Management</option></select>
                        <p class="text-xs text-red-600 mt-2">You are already registered for this course.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">Semester</label>
                        <input type="text" class="input-field bg-slate-50" name="semester" value="Semester I, 2026/2027" placeholder="" required readonly>
                    </div>
                </div>
                <div class="px-4 py-4 bg-white border-t border-slate-200 flex justify-between">
                    <a href="index.html" class="px-4 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-100">Cancel</a>
                    <button class="px-4 py-2 bg-[#2563eb] rounded-lg text-sm font-medium text-white hover:bg-[#1d4ed8]">Register</button>
                </div>
            </form>
            <!-- End: Form -->

        </main>
        <!-- Start: Footer -->
           @include('layouts.footer')
        <!-- End: Footer -->
    </div>
    <!-- End: Main content -->

@endsection
