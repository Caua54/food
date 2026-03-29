<?php

namespace App\Filament\Resources\Produtos\Schemas;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class ProdutoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('nome')
                ->label('Nome do Produto')
                ->required(),

            Textarea::make('descricao')
                ->label('Descrição'),

            TextInput::make('preco')
                ->label('Preço')
                ->numeric()
                ->required(),

            Select::make('categoria_id')
                ->label('Categoria')
                ->relationship('categoria', 'nome')
                ->searchable()
                ->required(),

         FileUpload::make('imagem')
            ->label('Imagem')
            ->image()
            ->disk('public')
            ->directory('produtos')
            ->visibility('public')
            ->imagePreviewHeight('150'),

        ]);
    }
}