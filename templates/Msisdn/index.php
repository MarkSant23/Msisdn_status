<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Msisdn[]|\Cake\Collection\CollectionInterface $msisdn
 */
?>

<!--Modal  -->
<!-- <a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="trigger"></a>
<div class="modal" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <h5>Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this phone number?</p>
            </div>
            <div class="modal-footer">
                <a role="button" class="btn btn-default btn-flat btn-lg" data-dismiss="modal">Cancel</a>
                <div id="ajax_button"></div>
            </div>
        </div>
    </div>
</div> -->

<div class="msisdn index content">
    <?= $this->Html->link(__('New Msisdn'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Msisdn') ?></h3>

    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key', ['label' => 'Filter Msisdn', 'value' => $this->request->getQuery('key'), 'autocomplete' => 'off']) ?>
    <!-- <?= $this->Form->submit() ?> -->
    <?= $this->Form->end() ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('msisdn') ?></th>
                    <th style="text-align:center;"><?= $this->Paginator->sort('Change status') ?></th>
                    <th></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <!-- <th><?= $this->Paginator->sort('deleted') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('user_id') ?></th> -->
                    <th class="actions" style="text-align:center;"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($msisdn as $msisdn): ?>
                <tr>
                    <td><b><?= h($msisdn->msisdn) ?></b></td>
                    
                    <td class="abc">
                        <?php if($msisdn->status != 0) : ?>
                            <span class="badge badge-secondary">Blocked</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">Unblocked</span>
                        <?php endif; ?>
                    </td>

                    <td class="bagdes">

                        <?php if ($msisdn->status != 0) : ?>
                            <button class="btn btn-primary"><?= $this->Form->postLink(__('Unblock'), ['action' => 'blockstatus', $msisdn->msisdn_id, $msisdn->status], ['confirm' => __('Are you sure you want to unblock {0}?', $msisdn->msisdn)]) ?></button>
                        
                        <?php else : ?>
                            <button class="btn btn-primary"><?= $this->Form->postLink(__('Block'), ['action' => 'blockstatus', $msisdn->msisdn_id, $msisdn->status], ['confirm' => __('Are you sure you want to block {0}?', $msisdn->msisdn)]) ?></button>
                        
                        <?php endif; ?>

                    </td>

                    <td><?= h($msisdn->created) ?></td>
                    <td><?= h($msisdn->modified) ?></td>
                    <!-- <td><?= h($msisdn->deleted) ?></td> -->        
                    <!-- <td><?= $this->Number->format($msisdn->user_id) ?></td> -->
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $msisdn->msisdn_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $msisdn->msisdn_id]) ?>
                        <?= $this->Form->postLink("Delete", array("action" => "delete",$msisdn->msisdn_id, "data-id"=>$msisdn->msisdn_id));?>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first( __('<<')) ?>
            <?= $this->Paginator->prev( __('<')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('>') ) ?>
            <?= $this->Paginator->last(__('>>') ) ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>


<!-- <script type="text/javascript">
    $(".delete-btn").click(function(){
        $("#ajax_button").html("<a href='/msisdn/delete/"+ $(this).attr("data-id")+"' class='btn btn-danger btn-flat btn-lg'>Confirm</a>");
        $("#trigger").click();
    });
</script> -->