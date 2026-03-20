<?php

namespace App\Filament\Resources\Produtos\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class ProdutosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagem')
                    ->label('Imagem'),

                TextColumn::make('nome')
                    ->searchable(),

                TextColumn::make('categoria.nome')
                    ->label('Categoria'),

                TextColumn::make('preco')
                    ->money('BRL')
                    ->label('Preço'),

                IconColumn::make('ativo')
                    ->boolean()
                    ->label('Ativo'),
            ]);
    }
}