<div class="numberingplans-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>

    <?= Nav::widget([
        "items" => [
            [
                "label" => "Home",
                "url" => ["site/index"],
                "linkOptions" => [...],
            ],
            [
                "label" => "Dropdown",
                "items" => [
                     ["label" => "Level 1 - Dropdown A", "url" => "#"],
                     "<li class="divider"></li>",
                     "<li class="dropdown-header">Dropdown Header</li>",
                     ["label" => "Level 1 - Dropdown B", "url" => "#"],
                ],
            ],
        ],
    ]);?></div>
