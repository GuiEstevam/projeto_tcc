<?php

namespace App\Observers;

use App\Models\Projeto;

class ProjetoObserver
{
    /**
     * Handle the Projeto "created" event.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return void
     */
    public function created(Projeto $projeto)
    {
        //
    }

    /**
     * Handle the Projeto "updated" event.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return void
     */
    public function updated(Projeto $projeto)
    {
        //
    }

    /**
     * Handle the Projeto "deleted" event.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return void
     */
    public function deleted(Projeto $projeto)
    {
        //
    }

    /**
     * Handle the Projeto "restored" event.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return void
     */
    public function restored(Projeto $projeto)
    {
        //
    }

    /**
     * Handle the Projeto "force deleted" event.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return void
     */
    public function forceDeleted(Projeto $projeto)
    {
        //
    }
}
