<?php

namespace App\Filament\Resources\Combos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class ComboForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('nome')
                ->label('Nome do Combo')
                ->required(),

            Textarea::make('descricao')
                ->label('Descrição'),

            TextInput::make('preco')
                ->label('Preço')
                ->numeric()
                ->required(),

            Toggle::make('ativo')
                ->label('Ativo')
                ->default(true),
        ]);
    }
}
