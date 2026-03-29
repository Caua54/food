<?php

namespace App\Filament\Resources\Combos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;

class ComboForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('nome')
                ->label('Nome do Combo')
                ->required(),

            Textarea::make('descricao')
                ->label('Descricao'),

            TextInput::make('preco')
                ->label('Preco')
                ->numeric()
                ->prefix('R$')
                ->required(),

            FileUpload::make('imagem')
                ->label('Imagem')
                ->image()
                ->disk('public')
                ->directory('combos')
                ->visibility('public')
                ->imagePreviewHeight('150'),

            Toggle::make('ativo')
                ->label('Ativo')
                ->default(true),
        ]);
    }
}