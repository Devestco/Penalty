<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{auth()->user()->avatar}}" alt="" class="avatar-md mx-auto rounded-circle">
            </div>
            <div class="mt-3">
                <a href="#" class="text-dark font-weight-medium font-size-16">{{auth()->user()->name}}</a>
                <p class="text-body mt-1 mb-0 font-size-13">{{auth()->user()->type}}</p>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">قائمة الأعضاء</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-flip-horizontal"></i>
                        <span>الأكادميات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">عرض الكل</a></li>
                        <li><a href="#">إضافة</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-gamepad-square"></i>
                        <span>المدربين</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">عرض الكل</a></li>
                        <li><a href="#">إضافة</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-football"></i>
                        <span>اللاعبين</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">عرض الكل</a></li>
                        <li><a href="#">إضافة</a></li>
                    </ul>
                </li>

                <li class="menu-title">قائمة الفعاليات</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-play"></i>
                        <span>الجروبات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">عرض الكل</a></li>
                        <li><a href="#">إضافة</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-play-network"></i>
                        <span>الكورسات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">عرض الكل</a></li>
                        <li><a href="#">إضافة</a></li>
                    </ul>
                </li>

                <li class="menu-title">قائمة محتويات النظام</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-flag"></i>
                        <span>الدول</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">عرض الكل</a></li>
                        <li><a href="#">إضافة</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-box-cutter"></i>
                        <span>تصنيفات الأكاديميات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">عرض الكل</a></li>
                        <li><a href="#">إضافة</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-contacts"></i>
                        <span>وسائل التواصل</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">عرض الكل</a></li>
                        <li><a href="#">إضافة</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-boxing-glove"></i>
                        <span>الرياضات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">عرض الكل</a></li>
                        <li><a href="#">إضافة</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
