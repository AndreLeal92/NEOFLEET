<script>

function toggleSidebar(){
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    // mobile
    sidebar.classList.toggle('open');
    overlay.classList.toggle('active');

    // desktop colapsar
    sidebar.classList.toggle('closed');
}

function toggleDropdown(el){
    el.parentElement.classList.toggle('open');
}

</script>

</body>
</html>