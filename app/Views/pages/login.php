<div class="w-full h-full flex flex-col items-center justify-center text-center">

    <div class="w-full md:w-1/2 xl:w-1/3">
        <h1 class="text-center text-3xl font-bold">Sign In</h1>
        <?php if (session()->getFlashdata('msg')): ?>
            <h1 class="text-xl text-red-500 font-bold">
                <?= session()->getFlashdata('msg') ?>
            </h1>
        <?php endif; ?>
        <form action="<?php echo base_url(); ?>login" method="post"
            class="w-11/12 mx-auto mt-4 p-2 flex flex-col gap-2 bg-slate-200 rounded">
            <?= csrf_field() ?>
            <input type="email" name="email" value="<?= set_value("email") ?>" placeholder="Email"
                class="w-full px-2 py-1 rounded">
            <input type="password" name="password" placeholder="Password" class="w-full px-2 py-1 rounded">
            <div class="flex justify-center gap-4">
                <button
                    class="px-2 py-1 text-white font-semibold bg-slate-500 hover:bg-slate-700 rounded">Login</button>
                <button type="button"
                    class="px-2 py-1 text-white font-semibold bg-slate-500 hover:bg-slate-700 rounded">Cancel</button>
            </div>
            <a href="/register" class="text-orange-700 ">Don't have an account? Sign Up here!</a>
        </form>
    </div>
</div>