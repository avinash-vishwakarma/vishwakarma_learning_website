<li>
    <a id="logoutBtn"><i class="bi bi-box-arrow-right"></i> Logout</a>
    <form action="{{ route("logout") }}" method="post" id="logoutform" class="d-none">
        @csrf
    </form>
    <script>
        document.getElementById("logoutBtn").addEventListener("click",function(){
            let logoutForm = document.getElementById("logoutform");
            logoutForm.submit();
        })
    </script>
</li>