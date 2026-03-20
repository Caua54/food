<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('nome')
                ->label('Nome')
                ->required(),

            Textarea::make('descricao')
                ->label('Descrição'),

            Toggle::make('ativo')
                ->label('Ativo')
                ->default(true),
        ]);
    }
}