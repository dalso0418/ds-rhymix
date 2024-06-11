#!/bin/bash

# 작업 디렉토리 설정
BASE_DIR="data"
REPO_URL="https://github.com/rhymix/rhymix.git"
GIT_USER="82"
GIT_GROUP="82"
SAFE_DIR="/data/ds-rhymix/data/rhymix"

# 필요한 하위 디렉토리 목록
SUBDIRS=("dataredis" "db" "logs")

# BASE_DIR 및 하위 디렉토리 생성
if [ ! -d "$BASE_DIR" ]; then
    mkdir "$BASE_DIR"
fi
cd "$BASE_DIR"

for dir in "${SUBDIRS[@]}"; do
    if [ ! -d "$dir" ]; then
        mkdir "$dir"
    fi
done

# Git 안전한 디렉토리로 추가
git config --global --add safe.directory "$SAFE_DIR"

# Rhymix 리포지토리 클론 또는 업데이트
if [ ! -d "rhymix" ]; then
    echo "Rhymix 최신버전 다운로드"
    git clone "$REPO_URL"
else
    echo "Rhymix 업데이트 시작"
    cd rhymix
    git fetch
    
    # 변경 사항이 있는지 확인
    if [ -n "$(git status --porcelain)" ]; then
        echo "변경된 파일을 임시 저장 중"
        git stash

        echo "업데이트 중"
        git pull

        echo "변경된 파일을 다시 적용 중"
        git stash apply

        # 충돌이 발생하는지 확인
        if [ $? -ne 0 ]; then
            echo "충돌 발생! 충돌을 해결하고 다시 시도하세요."
        else
            echo "업데이트가 성공적으로 완료되었습니다."
        fi

        # 임시 저장된 변경 내역 삭제
        git stash clear
    else
        echo "변경 사항 없음, 업데이트 중"
        git pull
    fi

    cd ..
fi

# 권한 변경
echo "권한 변경 중"
chown -R "$GIT_USER":"$GIT_GROUP" rhymix

echo "Done"

