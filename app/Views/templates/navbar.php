<header class="py-1 flex gap-2 justify-center bg-black border-b border-white">
    <a href="/profile_card/<?= esc($session->get('name')); ?>"
        class="text-white hover:text-purple-300 font-semibold transform duration-500">My Card
    </a>
    <a href="/dashboard" class="text-white hover:text-purple-300 font-semibold transform duration-500">Dashboard</a>
    <a href="/profile_edit" class="text-white hover:text-purple-300 font-semibold transform duration-500">Edit</a>
    <a href="/logout" class="text-white hover:text-purple-300 font-semibold transform duration-500">Sign Out</a>
</header>