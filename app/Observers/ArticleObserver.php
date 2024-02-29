<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        $original = $article->getOriginal();

        $changes = [];

        foreach ($original as $key => $value) {
            if ($article->$key !== $value) {
                $changes[$key] = [
                    'old' => $value,
                    'new' => $article->$key,
                ];
            }
        }

        if(!empty($changes)){
            // $user_id = Auth::id();
            $user_id = 1;

            AuditLog::create([
                'action' => 'update',
                'model_type' => get_class($article),
                'model_id' => $article->id,
                'user_id' => $user_id,
                'changes' => $changes
            ]);
        }
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        $user_id = 1;
        AuditLog::create([
            'action' => 'delete',
            'model_type' => get_class($article),
            'model_id' => $article->id,
            'user_id' => $user_id,
            'changes' => [], // No hay cambios, ya que el artículo fue eliminado
        ]);
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        //
    }
}
