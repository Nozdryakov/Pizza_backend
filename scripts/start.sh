#!/bin/bash

# Список команд
commands=("Выполнить миграции" "Выполнить сидеры" "Удалить таблицы" "Выйти")

# Цвета текста и фона
bg_white='\033[0;47m'

# Функция для вывода меню команд
display_menu() {
    clear
    echo "Меню команд:"
    for i in "${!commands[@]}"; do
        if [ $i -eq $selectedIndex ]; then
            echo -e "\033[38;5;16;48;5;231m➜ $((i + 1)). ${commands[$i]}\033[0m"
        else
            echo -e "${black}${white}  $((i + 1)). ${commands[$i]}${black}"
        fi
    done
}

# Инициализация переменных
selectedIndex=0
display_menu

# Основной цикл программы
while true; do
    # Чтение нажатой клавиши
    read -s -n 1 key

    case "$key" in
        "A") # Стрелка вверх
            if [ $selectedIndex -gt 0 ]; then
                ((selectedIndex--))
            fi
            display_menu
            ;;
        "B") # Стрелка вниз
            if [ $selectedIndex -lt $((${#commands[@]} - 1)) ]; then
                ((selectedIndex++))
            fi
            display_menu
            ;;
        "") # Enter
            clear
            case $selectedIndex in
                0)
                    # Сохраняем текущий каталог
                    current_dir=$(pwd)
                    # Переходим в каталог выше
                    cd ..
                    # Выполняем миграции
                    php yii migrate --interactive=0
                    # Возвращаемся в исходный каталог
                    cd "$current_dir"
                    ;;
                1)
                    # Сохраняем текущий каталог
                    current_dir=$(pwd)
                    # Переходим в каталог выше
                    cd ..
                    # Выполняем миграции
                    php yii seeder/execute-seeders-up
                    # Возвращаемся в исходный каталог
                    cd "$current_dir"
                    ;;
                2)
                    # Сохраняем текущий каталог
                    current_dir=$(pwd)
                    # Переходим в каталог выше
                    cd ..
                    # Выполняем миграции
                    php yii migrate/down all --interactive=0
                    # Возвращаемся в исходный каталог
                    cd "$current_dir"
                    ;;
                3)  exit 0 ;;
            esac
            read -p "Нажмите Enter для продолжения..."
            display_menu
            ;;
    esac
done
