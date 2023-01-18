x-terminal-emulator -e "cd /home/pi/InfoScreen; php artisan serve;" &
x-terminal-emulator -e "python3 /home/pi/InfoScreen/gpio/gpioApi.py;" &
xdg-open http://127.0.0.1:8000/werbung & 