# Get Port from CLI
PORT=3000
while getopts "p:" option; do
  case $option in
    p ) PORT=$OPTARG;;
  esac
done

mkdir -p app mysql
docker pull mattrayner/lamp:latest-1604-php7
docker run -p "$PORT:80" -v ${PWD}/app:/app -v ${PWD}/mysql:/var/lib/mysql mattrayner/lamp:latest-1604-php7
