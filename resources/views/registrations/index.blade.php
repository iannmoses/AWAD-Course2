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
            <div class="space-y-1 mb-5"><p class="px-3 text-xs font-semibold text-slate-400 uppercase mb-2">Main</p><a href="../dashboard.html" class="sidebar-item border-l-3 border-transparent text-slate-500 flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="layout-dashboard" class="w-5 h-5 text-slate-400 group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">Dashboard</span></a><a href="../courses/index.html" class="sidebar-item border-l-3 border-transparent text-slate-500 flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="book-open" class="w-5 h-5 text-slate-400 group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">Available courses</span></a><a href="../registrations/index.html" class="sidebar-item active border-l-3 border-[#2563eb] bg-blue-50 text-[#2563eb] flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="clipboard-check" class="w-5 h-5 text-[#2563eb] group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">My registrations</span></a><a href="../registrations/create.html" class="sidebar-item border-l-3 border-transparent text-slate-500 flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="plus-circle" class="w-5 h-5 text-slate-400 group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">Register for a course</span></a></div><div class="space-y-1 mb-5"><p class="px-3 text-xs font-semibold text-slate-400 uppercase mb-2">Account</p><a href="../profile.html" class="sidebar-item border-l-3 border-transparent text-slate-500 flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3"><i data-lucide="user-cog" class="w-5 h-5 text-slate-400 group-hover:text-[#2563eb] transition-colors"></i><span class="ms-3 text-sm font-medium">My Account</span></a></div>
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
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div>
                    <h1 class="text-xl font-semibold">My registrations</h1>
                    <p class="text-sm text-slate-500 mt-1">Courses you have registered for in Semester I, 2026/2027.</p>
                </div>
                <a href="create.html" class="inline-flex items-center px-4 py-2 bg-[#2563eb] rounded-lg text-sm font-medium text-white hover:bg-[#1d4ed8]"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>Register for a course</a>
            </div>
            <!-- End: Page heading -->

            <!-- Start: Success message -->
            <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl p-4 mb-6 text-sm">
                <i data-lucide="check-circle-2" class="w-5 h-5 shrink-0"></i>
                <div><p class="font-semibold">Registration saved</p><p class="mt-0.5">You are now registered for BUC 3102 Database Management Systems.</p></div>
            </div>
            <!-- End: Success message -->

            <!-- Start: My registrations table -->
            <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[640px]">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-50">
                                <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th><th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Title</th><th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Lecturer</th><th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Registered on</th><th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="py-3 px-4 text-sm"><span class="text-xs font-semibold text-[#2563eb]">BUC 3131</span></td><td class="py-3 px-4 text-sm">Advanced Web Application Development</td><td class="py-3 px-4 text-sm text-slate-500">Dr. Peter Mugisha</td><td class="py-3 px-4 text-sm text-slate-500">14 Sep</td><td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-emerald-50 text-emerald-700">Registered</span></td>
                            </tr>
                            <tr class="hover:bg-slate-50">
                                <td class="py-3 px-4 text-sm"><span class="text-xs font-semibold text-[#2563eb]">BUC 3102</span></td><td class="py-3 px-4 text-sm">Database Management Systems</td><td class="py-3 px-4 text-sm text-slate-500">Dr. Peter Mugisha</td><td class="py-3 px-4 text-sm text-slate-500">17 Sep</td><td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-emerald-50 text-emerald-700">Registered</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End: My registrations table -->

        </main>
        <!-- Start: Footer -->
          @include('layouts.footer')
        <!-- End: Footer -->
    </div>
    <!-- End: Main content -->

@endsection

