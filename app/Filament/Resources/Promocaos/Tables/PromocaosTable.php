<?php

namespace App\Filament\Resources\Promocaos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PromocaosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('desconto')
                    ->label('Desconto')
                    ->money('BRL')
                    ->sortable(),

                TextColumn::make('produtos_count')
                    ->label('Produtos')
                    ->counts('produtos')
                    ->sortable(),

                TextColumn::make('data_inicio')
                    ->label('Início')
                    ->date('d/m/Y')
                    ->placeholder('-')
                    ->sortable(),

                TextColumn::make('data_fim')
                    ->label('Fim')
                    ->date('d/m/Y')
                    ->placeholder('-')
                    ->sortable(),

                IconColumn::make('ativo')
                    ->label('Ativa')
                    ->boolean(),
            ])
            ->filters([
                TernaryFilter::make('ativo')
                    ->label('Status'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
