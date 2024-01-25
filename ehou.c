#include <stdio.h>
#include <stdbool.h>

// Hàm kiểm tra số nguyên tố
bool laSoNguyenTo(int num) {
    if (num < 2) {
        return false;
    }
    for (int i = 2; i * i <= num; i++) {
        if (num % i == 0) {
            return false;
        }
    }
    return true;
}

int main() {
    int soLuongPhanTu;

    // Yêu cầu nhập vào số lượng phần tử của dãy
    printf("Nhap so luong phan tu cua day: ");
    scanf("%d", &soLuongPhanTu);

    // Khai báo mảng và nhập giá trị cho mảng
    int mang[soLuongPhanTu];
    printf("Nhap cac phan tu cua day:\n");
    for (int i = 0; i < soLuongPhanTu; i++) {
        scanf("%d", &mang[i]);
    }

    // a. Hiển thị dãy số ra màn hình
    printf("Danh sach cac phan tu trong day:\n");
    for (int i = 0; i < soLuongPhanTu; i++) {
        printf("%d ", mang[i]);
    }
    printf("\n");

    // b. Nhập số nguyên x và hiển thị thông tin về x trong dãy
    int x;
    printf("Nhap so nguyen x: ");
    scanf("%d", &x);

    int demXuatHien = 0; // Đếm số lần xuất hiện của x
    printf("Vi tri xuat hien cua %d trong day: ", x);
    for (int i = 0; i < soLuongPhanTu; i++) {
        if (mang[i] == x) {
            printf("%d ", i + 1); // Vị trí xuất hiện (vị trí bắt đầu từ 1)
            demXuatHien++;
        }
    }
    printf("\nSo lan xuat hien cua %d trong day: %d\n", x, demXuatHien);

    // c. Xóa các số có giá trị bằng 0
    for (int i = 0; i < soLuongPhanTu; i++) {
        if (mang[i] == 0) {
            // Dịch chuyển các phần tử sau phần tử bằng 0 lên trên
            for (int j = i; j < soLuongPhanTu - 1; j++) {
                mang[j] = mang[j + 1];
            }
            soLuongPhanTu--; // Giảm kích thước của mảng
            i--; // Kiểm tra lại phần tử hiện tại sau khi xóa
        }
    }

    // d. Sắp xếp số nguyên tố về đầu dãy, số không phải là số nguyên tố về cuối dãy
    int viTriNguyenTo = 0;
    int viTriKhongNguyenTo = soLuongPhanTu - 1;
    int mangTam[soLuongPhanTu];

    for (int i = 0; i < soLuongPhanTu; i++) {
        if (laSoNguyenTo(mang[i])) {
            mangTam[viTriNguyenTo++] = mang[i];
        } else {
            mangTam[viTriKhongNguyenTo--] = mang[i];
        }
    }

    // Copy mảng tạm vào mảng chính
    for (int i = 0; i < soLuongPhanTu; i++) {
        mang[i] = mangTam[i];
    }

    // e. Tính trung bình cộng các số chia hết cho 3 trong dãy
    int tongChiaHetCho3 = 0;
    int demChiaHetCho3 = 0;

    for (int i = 0; i < soLuongPhanTu; i++) {
        if (mang[i] % 3 == 0) {
            tongChiaHetCho3 += mang[i];
            demChiaHetCho3++;
        }
    }

    if (demChiaHetCho3 > 0) {
        float trungBinhCongChiaHetCho3 = (float)tongChiaHetCho3 / demChiaHetCho3;
        printf("Trung binh cong cac so chia het cho 3: %.2f\n", trungBinhCongChiaHetCho3);
    } else {
        printf("Khong co so nao chia het cho 3 trong day.\n");
    }

    // Hiển thị dãy sau khi thực hiện các thao tác
    printf("Danh sach sau khi thuc hien cac yeu cau:\n");
    for (int i = 0; i < soLuongPhanTu; i++) {
        printf("%d ", mang[i]);
    }
    printf("\n");

    return 0;
}
