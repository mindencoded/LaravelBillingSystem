@if (session()->has('success'))
<p style="color:white;background-color:green;width: 250px;height: auto;">{{ session('success') }}</p>
<br>
@endif
@if (session()->has('warning'))
<p style="color:black;background-color:yellow;width: 250px;height: auto;">{{ session('warning') }}</p>
<br>
@endif
@if (session()->has('danger'))
<p style="color:white;background-color:red;width: 250px;height: auto;">{{ session('danger') }}</p>
<br>
@endif
@if (session()->has('info'))
<p style="color:black;background-color:skyblue;width: 250px;height: auto;">{{ session('info') }}</p>
<br>
@endif
