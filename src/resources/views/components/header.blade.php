<header class="header">
    <div class="header-contents">
        <h1 class="header-logo">PiGly</h1>

        <div class="header-buttons">
            <a href="{{ route('weight_logs.goal_setting') }}" class="header-button">
                <i class="fa-solid fa-gear"></i>
                目標体重設定</a>
                <form method="POST" action="{{ route('logout') }}" class="header-button">
                    @csrf
                    <button type="submit" class="logout-button">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        ログアウト
                    </button>
                </form>
        </div>
    </div>
</header>