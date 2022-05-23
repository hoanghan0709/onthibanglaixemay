import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';

class SingleRadioButton<T> extends StatelessWidget {
  final T value;
  final T groupValue;
  final String title;
  final ValueChanged<T?> onChanged;

  const SingleRadioButton({
    required this.value,
    required this.groupValue,
    required this.onChanged,
    required this.title,
  });

  @override
  Widget build(BuildContext context) {
    final title = this.title;
    return InkWell(
      onTap: () => onChanged(value),
      child: Container(
        margin: const EdgeInsets.symmetric(horizontal: 14),
        height: 50,
        child: Row(
          children: [
            _customRadioButton,
            SizedBox(width: 16),
            Expanded(
              child: Text(
                title,
                style: TextStyle(fontSize: 14),
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget get _customRadioButton {
    final isSelected = value == groupValue;
    return SvgPicture.asset(
      isSelected
          ? 'assets/ic_check_circle.svg'
          : 'assets/ic_uncheck_circle.svg',
      height: 24,
      width: 24,
    );
  }
}
