<nav class="menu">
    <a href="/">Main Page</a>
    @auth
        <a  href="/edit">Edit</a>
        <a href="/logout">Logout</a>
    @endauth
    @guest
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    @endguest

</nav>
