<?php

namespace App\Filament\Resources\Combos\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class CombosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable(),

                TextColumn::make('descricao')
                    ->label('Descrição')
                    ->limit(30),

                TextColumn::make('preco')
                    ->label('Preço')
                    ->money('BRL'),

                IconColumn::make('ativo')
                    ->label('Ativo')
                    ->boolean(),
            ]);
    }
}