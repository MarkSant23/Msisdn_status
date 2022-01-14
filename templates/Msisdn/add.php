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
            <?= $this->Html->link(__('List Msisdn'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="msisdn form content">
            <?= $this->Form->create($msisdn) ?>
            <fieldset>
                <!-- <legend><?= __('Add Msisdn') ?></legend> -->
                <?php
                    echo $this->Form->controls  (['msisdn' => ['placeholder' => 'Enter a phone number', 'required' => true]]);
                    // echo $this->Form->control('status', array('type'=> 'number', 'min'=>0 , 'max'=>1);

                    $arrStatus=array(0=>"Unblock",1=>"Block");
                    echo $this->Form->control('status', array('options'=>$arrStatus, 'label'=>'Status',
                                  'empty'=>'','required'=>'required', 'selected'=>'Your selection'));

                    //echo $this->Form->input('modified', array('empty' => true));
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
