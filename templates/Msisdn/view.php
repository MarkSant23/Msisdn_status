<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Msisdn $msisdn
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <nav class="nav">
                <a class="nav-link"><?= $this->Html->link(__('Edit'), ['action' => 'edit', $msisdn->msisdn_id], ['class' => 'side-nav-item']) ?></a>
                <a class="nav-link" ><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $msisdn->msisdn_id], ['confirm' => __('Are you sure you want to delete {0}?', $msisdn->msisdn), 'class' => 'side-nav-item']) ?></a>
                <!-- <a class="nav-link" ><?= $this->Form->postLink("Delete", array("action" => "delete",$msisdn->msisdn_id, "data-id"=>$msisdn->msisdn_id));?></a> -->
                <a class="nav-link"><?= $this->Html->link(__('List of Msisdns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?></a>
                <a class="nav-link" ><?= $this->Html->link(__('New Msisdn'), ['action' => 'add'], ['class' => 'side-nav-item']) ?> </a>
            </nav>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="msisdn view content">
            <h3><?= h($msisdn->msisdn) ?></h3>
            <table>
                <tr>
                    <th><?= __('Msisdn') ?></th>
                    <td><b><?= h($msisdn->msisdn) ?></b></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td>
                        <?php if($msisdn->status != 0) : ?>
                            <span class="badge badge-primary">Blocked</span>
                        <?php else: ?>
                            <span class="badge badge-primary">Unblocked</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($msisdn->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($msisdn->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
