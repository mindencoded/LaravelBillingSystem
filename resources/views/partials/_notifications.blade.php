@if (session()->has('success'))
    <p style="color:white;background-color:green:">{{ session('success') }}</p>
@endif
@if (session()->has('warning'))
    <p style="color:black;background-color:yellow;">{{ session('warning') }}</p>
@endif
@if (session()->has('danger'))
    <p style="color:white;background-color:red;">{{ session('danger') }}</p>
@endif
@if (session()->has('info'))
    <p style="color:black;background-color:skyblue;">{{ session('info') }}</p>
@endif
