<nav class="navbar navbar-expand-lg navbar-dark mc-nav">
    <a class="navbar-brand" href="<?= route('matches'); ?>">Тото 1</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= route('matches'); ?>">Начало</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= route('matches13').'#live'; ?>">Тото 13 срещи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= route('matches12').'#live'; ?>">Тото 12 срещи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= route('matches10').'#live'; ?>">Тото 10 срещи</a>
            </li>
        </ul>
    </div>
</nav>

