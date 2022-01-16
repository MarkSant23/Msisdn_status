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
            <div class="nav">
                <a class="nav-link"><?= $this->Form->postLink(__('Delete'),['action' => 'delete', $msisdn->msisdn_id],['confirm' => __('Are you sure you want to delete # {0}?', $msisdn->msisdn), 'class' => 'side-nav-item']) ?></a>
                <a class="nav-link"><?= $this->Html->link(__('List of Msisdns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?></a>
            </div>
            
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="msisdn form content">
            <?= $this->Form->create($msisdn) ?>
            <fieldset>
                <legend><?= __('Edit Msisdn') ?></legend>
                <?php
                    echo $this->Form->control('msisdn');
                    
                    $arrStatus=array(0=>"Unblock",1=>"Block");
                    echo $this->Form->control('status', array('options'=>$arrStatus, 'label'=>'Status',
                                  'empty'=>''));

                    echo $this->Form->control('created');
                    echo $this->Form->control('modified', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
