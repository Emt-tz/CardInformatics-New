#!/bin/bash

# Check if the OS is Windows
if [[ "$OSTYPE" == "msys" ]]; then
  echo "Detected Windows"

  # Download and run the Windows Installer
  curl -sS https://getcomposer.org/installer -o composer-setup.php
  php composer-setup.php --install-dir=bin --filename=composer
  rm composer-setup.php
  echo "Composer installed in the 'bin' directory."

else
  # Assume non-Windows OS (e.g., Linux or macOS)

  # Check if PHP is installed
  if command -v php >/dev/null 2>&1; then
    echo "Detected Linux/macOS"

    # Download and install Composer
    EXPECTED_SIGNATURE="$(curl -sS https://composer.github.io/installer.sig)"
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ACTUAL_SIGNATURE="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

    if [ "$EXPECTED_SIGNATURE" == "$ACTUAL_SIGNATURE" ]; then
      php composer-setup.php --install-dir=/usr/local/bin --filename=composer
      rm composer-setup.php
      echo "Composer installed globally."
    else
      echo "Composer installation failed. Signature mismatch."
      rm composer-setup.php
      exit 1
    fi

  else
    echo "PHP is not installed. Please install PHP and rerun this script."
    exit 1
  fi
fi

# Verify Composer installation
composer --version

exit 0
