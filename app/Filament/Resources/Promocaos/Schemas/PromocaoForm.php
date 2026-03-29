<?php

namespace App\Filament\Resources\Promocaos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PromocaoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('titulo')
                    ->label('Título da promoção')
                    ->required()
                    ->maxLength(120),

                Textarea::make('descricao')
                    ->label('Descrição')
                    ->rows(3),

                TextInput::make('desconto')
                    ->label('Desconto (R$)')
                    ->numeric()
                    ->step(0.01)
                    ->minValue(0)
                    ->required(),

                Select::make('produtos')
                    ->label('Produtos da promoção')
                    ->relationship('produtos', 'nome')
                    ->multiple()
                    ->preload()
                    ->searchable(),

                DatePicker::make('data_inicio')
                    ->label('Início (opcional)'),

                DatePicker::make('data_fim')
                    ->label('Fim (opcional)')
                    ->afterOrEqual('data_inicio'),

                Toggle::make('ativo')
                    ->label('Promoção ativa')
                    ->default(true),
            ]);
    }
}
