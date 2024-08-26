<!DOCTYPE html>
<html lang="en">
@include('layouts.components.head')
<!-- Thêm jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Thêm jQuery Validation -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
<!-- Thêm jQuery Validation tiếng Việt (tuỳ chọn) -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/additional-methods.min.js"></script>

<body>
<style>
    .btn-sb {
        color: #FFFFFF;
        background: #ce4be8;
        background: -moz-linear-gradient(-45deg, #ce4be8 0%, #207ce5 100%);
        background: -webkit-gradient(left top, right bottom, color-stop(0%, #ce4be8), color-stop(100%, #207ce5));
        background: -webkit-linear-gradient(-45deg, #ce4be8 0%, #207ce5 100%);
        background: -o-linear-gradient(-45deg, #ce4be8 0%, #207ce5 100%);
        background: -ms-linear-gradient(-45deg, #ce4be8 0%, #207ce5 100%);
        background: -webkit-linear-gradient(315deg, #ce4be8 0%, #207ce5 100%);
        background: -o-linear-gradient(315deg, #ce4be8 0%, #207ce5 100%);
        background: linear-gradient(135deg, #ce4be8 0%, #207ce5 100%);
    }
</style>
@include('layouts.components.header')
@yield('content')
@include('layouts.components.script')
</body>
</html>
